import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SettingsRoutingModule } from './settings-routing.module';
import { UserSettingsComponent } from './user-settings/user-settings.component';
import { CoreModule } from '@app/core';
import { SharedModule } from '@app/shared';

@NgModule({
  declarations: [UserSettingsComponent],
  imports: [CommonModule, CoreModule, SharedModule, SettingsRoutingModule]
})
export class SettingsModule {
}
