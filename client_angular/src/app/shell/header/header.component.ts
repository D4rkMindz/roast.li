import { Title } from '@angular/platform-browser';
import { Component, Input, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { MatSidenav } from '@angular/material';

import { AuthenticationService, I18nService, Logger } from '@app/core';

const Log = new Logger('HEADER');

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
  @Input()
  sidenav: MatSidenav;

  constructor(
    private router: Router,
    private titleService: Title,
    private authenticationService: AuthenticationService,
    private i18nService: I18nService
  ) {
  }

  get currentLanguage(): string {
    return this.i18nService.language;
  }

  get languages(): string[] {
    return this.i18nService.supportedLanguages;
  }

  get username(): string {
    const credentials = this.authenticationService.credentials;
    return credentials ? credentials.username : null;
  }

  get title(): string {
    return this.titleService.getTitle();
  }

  ngOnInit() {
  }

  setLanguage(language: string) {
    this.i18nService.language = language;
  }

  logout() {
    Log.debug('logging out...');
    this.authenticationService.logout().then(() => this.router.navigate(['/login'], {replaceUrl: true}));
  }
}
