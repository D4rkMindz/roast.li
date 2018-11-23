import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { Shell } from '@app/shell';
import { extract } from '@app/core';
import { UserSettingsComponent } from '@app/settings/user-settings/user-settings.component';

const routes: Routes = [
  Shell.childRoutes([
    {path: 'settings', component: UserSettingsComponent, data: {title: extract('Home')}}
  ])
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class SettingsRoutingModule {
}
