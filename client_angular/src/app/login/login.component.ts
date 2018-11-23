import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';

import {environment} from '@env/environment';
import {
  AuthenticationService,
  extract,
  I18nService,
  Language,
  Logger,
  SnackbarService,
} from '@app/core';

const Log = new Logger('LOGIN');

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {
  version: string = environment.version;
  error: string;
  loginForm: FormGroup;
  isLoading = false;

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private formBuilder: FormBuilder,
    private i18nService: I18nService,
    private authenticationService: AuthenticationService,
    private snackbar: SnackbarService,
  ) {
    this.createForm();
  }

  get currentLanguage(): string {
    return this.i18nService.language;
  }

  get languages(): Language[] {
    return environment.supportedLanguages;
  }

  ngOnInit() {}

  async login() {
    this.isLoading = true;
    const loggedIn = await this.authenticationService.login(
      this.loginForm.value,
    );
    this.loginForm.markAsPristine();
    this.isLoading = false;
    if (loggedIn) {
      this.snackbar.notification(
        extract(`Welcome ${this.loginForm.controls.username.value}`),
      );
      this.route.queryParams.subscribe(params =>
        this.router.navigate([params.redirect || '/'], {replaceUrl: true}),
      );
      return;
    }
    this.error = extract('Username or password invalid');
  }

  setLanguage(language: string) {
    this.i18nService.language = language;
  }

  private createForm() {
    this.loginForm = this.formBuilder.group({
      username: ['', Validators.required],
      password: ['', Validators.required],
      remember: true,
    });
  }
}
