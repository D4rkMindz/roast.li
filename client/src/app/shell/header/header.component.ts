import { Title } from '@angular/platform-browser';
import { Component, Input, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { MatSidenav } from '@angular/material';

import { AuthenticationService, I18nService, Language } from '@app/core';
import { SnackbarService } from '@app/shared/snackbar/snackbar.service';
import { environment } from '@env/environment';

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
    private i18nService: I18nService,
    private snackbar: SnackbarService
  ) {}

  ngOnInit() {}

  setLanguage(language: string) {
    this.i18nService.language = language;
  }

  logout() {
    this.authenticationService.logout().then(() => {
      this.snackbar.notification('Bye!');
      this.router.navigate(['/'], { replaceUrl: true });
    });
  }

  get currentLanguage(): string {
    return this.i18nService.language;
  }

  get languages(): Language[] {
    return environment.supportedLanguages;
  }

  get username(): string {
    const credentials = this.authenticationService.credentials;
    return credentials ? credentials.username : null;
  }

  get title(): string {
    return this.titleService.getTitle();
  }
}
