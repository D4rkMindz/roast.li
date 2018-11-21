import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";

import { SettingsRoutingModule } from "./settings-routing.module";
import { UserSettingsComponent } from "./user-settings/user-settings.component";

@NgModule({
  declarations: [UserSettingsComponent],
  imports: [CommonModule, SettingsRoutingModule]
})
export class SettingsModule {}
