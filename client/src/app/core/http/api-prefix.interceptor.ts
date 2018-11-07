import { Injectable, Injector } from '@angular/core';
import { HttpEvent, HttpHandler, HttpInterceptor, HttpRequest, HttpResponse } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';

import { environment } from '@env/environment';
import { Router } from '@angular/router';
import { AuthenticationService } from '../authentication/authentication.service';

/**
 * Prefixes all requests with `environment.serverUrl`.
 */
@Injectable()
export class ApiPrefixInterceptor implements HttpInterceptor {
  public constructor(private inj: Injector) {
  }

  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    if (!/^(http|https):/i.test(request.url)) {
      request = request.clone({ url: environment.serverUrl + request.url, withCredentials: true });
    }
    const obs = next.handle(request);
    obs.subscribe((response: HttpResponse<any>) => {
      if (!/nicipedia/.test(response['url'])) {
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
      this.inj.get(AuthenticationService).logout();
      this.inj.get(Router).navigate(['/login']);
      return throwError(response);
    });
    return obs;
  }
}
