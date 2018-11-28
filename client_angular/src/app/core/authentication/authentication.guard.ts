import {Injectable} from '@angular/core';
import {
  ActivatedRouteSnapshot,
  CanActivate,
  Router,
  RouterStateSnapshot,
} from '@angular/router';

import {Logger} from '../logger.service';
import {AuthenticationService} from './authentication.service';

const log = new Logger('AuthenticationGuard');

@Injectable()
export class AuthenticationGuard implements CanActivate {
  constructor(
    private router: Router,
    private authenticationService: AuthenticationService,
  ) {
  }

  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot,
  ): boolean {
    const canLogin = !!(this.authenticationService.credentials && this.authenticationService.credentials.token);
    if (!canLogin && !/login|home/.test(route.firstChild.url[0].path)) {
      this.router.navigate(['/login']);
      return false;
    }
    return true;
  }
}
