import {Injectable} from '@angular/core';
import {
  HttpEvent,
  HttpHandler,
  HttpInterceptor,
  HttpRequest,
} from '@angular/common/http';
import {Observable} from 'rxjs';
import {catchError} from 'rxjs/operators';

import {environment} from '@env/environment';
import {Logger} from '../logger.service';
import {Router} from '@angular/router';

const Log = new Logger('ERROR-HANDLER');

/**
 * Adds a default error handler to all requests.
 */
@Injectable()
export class ErrorHandlerInterceptor implements HttpInterceptor {
  public constructor(private router: Router) {}

  intercept(
    request: HttpRequest<any>,
    next: HttpHandler,
  ): Observable<HttpEvent<any>> {
    return next
      .handle(request)
      .pipe(catchError(response => this.errorHandler(response)));
  }

  // Customize the default error handler here if needed
  private errorHandler(response: HttpEvent<any>): Observable<HttpEvent<any>> {
    if (!environment.production) {
      // Do something with the error
      Log.error('Request error', response);
    }
    if (response['status'] === 401) {
      this.router.navigate(['/login']);
    }
    throw response;
  }
}
