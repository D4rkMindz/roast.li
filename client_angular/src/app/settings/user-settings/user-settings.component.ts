import { Component, OnInit } from '@angular/core';
import { AuthenticationService, CompleteUser, UserService } from '@app/core';

@Component({
  selector: 'app-user-settings',
  templateUrl: './user-settings.component.html',
  styleUrls: ['./user-settings.component.scss']
})
export class UserSettingsComponent implements OnInit {
  user: CompleteUser = null;
  isLoading = false;

  constructor(private userService: UserService, private auth: AuthenticationService) {
  }

  async ngOnInit() {
    this.isLoading = true;
    this.user = await this.userService.getUser(this.auth.credentials.id);
    this.isLoading = false;
  }
}
