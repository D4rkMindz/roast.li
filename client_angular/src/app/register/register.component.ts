import { Component, OnInit } from "@angular/core";
import { AbstractControl, FormBuilder, FormGroup, Validators } from "@angular/forms";
import { ActivatedRoute, Router } from "@angular/router";
import {
  AuthenticationService,
  CompleteUser,
  extract,
  I18nService,
  LoginContext,
  SnackbarService,
  UserService
} from "@app/core";
import { environment } from "@env/environment";

@Component({
  selector: "app-register",
  templateUrl: "./register.component.html",
  styleUrls: ["./register.component.scss"]
})
export class RegisterComponent implements OnInit {
  error: string;
  isLoading = false;
  registrationForm: FormGroup;
  version = environment.version;

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private formBuilder: FormBuilder,
    private i18nService: I18nService,
    private authenticationService: AuthenticationService,
    private userService: UserService,
    private snackbar: SnackbarService
  ) {
    this.createForm();
  }

  get currentLanguage(): string {
    return this.i18nService.language;
  }

  get languages(): string[] {
    return this.i18nService.supportedLanguages;
  }

  static matchPasswordValidation(ac: AbstractControl) {
    const password = ac.get("password").value;
    const confirmPassword = ac.get("passwordRetype").value;
    if (ac.get("passwordRetype").touched && !confirmPassword) {
      ac.get("passwordRetype").setErrors({ matchPassword: false });
      return;
    }
    if (password !== confirmPassword) {
      console.log("false");
      ac.get("passwordRetype").setErrors({ matchPassword: true });
    } else {
      console.log("true");
      return;
    }
  }

  ngOnInit() {}

  async register() {
    if (this.registrationForm.invalid) {
      return;
    }
    this.isLoading = true;
    const username = this.registrationForm.controls["username"].value;
    const email = this.registrationForm.controls["email"].value;
    const firstName = this.registrationForm.controls["firstname"].value;
    const lastName = this.registrationForm.controls["lastname"].value;
    const password = this.registrationForm.controls["password"].value;
    const user = new CompleteUser(username, firstName, lastName, password, email);
    this.userService.register(user).subscribe(async (response: any) => {
      this.isLoading = false;
      if (response.success) {
        const loginContext: LoginContext = {
          username: user.username,
          password: user.password
        };
        const loggedIn = await this.authenticationService.login(loginContext);
        this.registrationForm.markAsPristine();
        if (loggedIn) {
          this.snackbar.notification(extract(`Welcome ${loginContext.username}. You registered successfully`));
          this.route.queryParams.subscribe(params =>
            this.router.navigate([params.redirect || "/"], { replaceUrl: true })
          );
          return;
        }
        this.snackbar.error(extract("Registration complete, but automatic login failed. Please try to login"));
        return;
      }

      console.log(response);
      for (const error of response["validation"]["errors"]) {
        this.registrationForm.controls[error.field].setErrors({ custom: error.message });
      }

      this.error = response.validation.message;
    });
  }

  setLanguage(language: string) {
    this.i18nService.language = language;
  }

  private createForm() {
    this.registrationForm = this.formBuilder.group(
      {
        username: ["", [Validators.required]],
        firstname: ["", [Validators.required]],
        lastname: ["", [Validators.required]],
        password: ["", [Validators.required]],
        passwordRetype: ["", [Validators.required]],
        email: ["", [Validators.required, Validators.email]]
      },
      {
        validator: RegisterComponent.matchPasswordValidation
      }
    );
  }
}
