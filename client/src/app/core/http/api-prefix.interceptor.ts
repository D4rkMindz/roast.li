import { Injectable, Injector } from '@angular/core';
import { HttpEvent, HttpHandler, HttpInterceptor, HttpRequest, HttpResponse } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';

import { environment } from '@env/environment';
import { Router } from '@angular/router';
import { AuthenticationService } from '../authentication/authentication.service';
import { Logger } from '../logger.service';

const Log = new Logger('API-PREFIX');

/**
 * Prefixes all requests with `environment.serverUrl`.
 */
@Injectable()
export class ApiPrefixInterceptor implements HttpInterceptor {
  public constructor(private inj: Injector) {}

  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    Log.debug('Requesting ' + request.url);
    if (!/^(http|https):/i.test(request.url)) {
      request = request.clone({ url: environment.serverUrl + request.url, withCredentials: true });
      Log.debug('Request cloned');
    }

    const obs = next.handle(request);
    obs.subscribe((response: HttpResponse<any>) => {
      if (!/Roast.li/.test(response['url'])) {
        return;
      }
      if (!response || response.type === 0) {
        return;
      }
      if (response.headers.get('x-authenticated')) {
        return;
      }
      if (/login/.test(response.url)) {
        return;
      }
      const auth = this.inj.get(AuthenticationService);
      if (auth.isAuthenticated()) {
        auth.logout().then(() => {
          this.inj.get(Router).navigate(['/']);
        });
        return;
      }
      throwError(response);
    });
    return obs;
  }
}
