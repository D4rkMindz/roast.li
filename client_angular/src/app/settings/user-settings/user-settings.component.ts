import {Component, OnInit, ViewChild} from '@angular/core';
import { AuthenticationService, CompleteUser, extract, Logger, SnackbarService, UserService } from '@app/core';
import {AbstractControl, FormBuilder, FormGroup, FormGroupDirective, Validators} from '@angular/forms';

const Log = new Logger('USER-SETTINGS');

@Component({
  selector: 'app-user-settings',
  templateUrl: './user-settings.component.html',
  styleUrls: ['./user-settings.component.scss'],
})
export class UserSettingsComponent implements OnInit {
  user: CompleteUser = null;
  error: string = null;
  isLoading = false;
  isLoadingPassword = false;
  passwordForm: FormGroup;
  @ViewChild(FormGroupDirective) passwordFormGroupDirective: FormGroupDirective;

  static matchPasswordValidation(ac: AbstractControl) {
    const password = ac.get('password').value;
    const confirmPassword = ac.get('passwordRetype').value;
    if (ac.get('passwordRetype').touched && !confirmPassword) {
      ac.get('passwordRetype').setErrors({matchPassword: false});
      return;
    }
    if (password !== confirmPassword) {
      Log.debug('false');
      ac.get('passwordRetype').setErrors({matchPassword: true});
    } else {
      Log.debug('true');
      return;
    }
  }

  constructor(
    private userService: UserService,
    private auth: AuthenticationService,
    private snackbar: SnackbarService,
    private formBuilder: FormBuilder,
  ) {
    this.passwordForm = this.buildForm();
  }

  async ngOnInit() {
    this.isLoading = true;
    this.user = await this.userService.getUser(this.auth.credentials.id);
    this.isLoading = false;
  }

  reload() {
    window.location.reload();
  }

  async resetPassword() {
    if (this.passwordForm.invalid) {
      return;
    }
    this.isLoadingPassword = true;
    const oldPassword = this.passwordForm.controls['passwordOld'].value;
    const password = this.passwordForm.controls['password'].value;
    const validation = await this.userService.updatePassword(this.user.id, oldPassword, password);
    if (validation === true) {
      this.isLoadingPassword = false;
      this.passwordFormGroupDirective.resetForm();

      this.snackbar.notification(extract('Updated password'));
      return;
    }

    this.error = validation.message;

    for (let i = 0; i < validation.errors.length; i++) {
      const error = validation.errors[i];
      this.passwordForm.controls[error.field].setErrors({message: error.message});
    }
    this.isLoadingPassword = false;
  }

  private buildForm() {
    return this.formBuilder.group({
        passwordOld: ['', [Validators.required]],
        password: ['', Validators.required],
        passwordRetype: ['', [Validators.required]],
      },
      {
        validator: UserSettingsComponent.matchPasswordValidation,
      });
  }
}
