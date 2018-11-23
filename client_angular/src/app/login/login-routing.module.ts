import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';

import {extract} from '@app/core';
import {LoginComponent} from './login.component';
import {Shell} from '@app/shell/shell.service';

const routes: Routes = [
  Shell.childRoutes([
    {path: 'login', component: LoginComponent, data: {title: extract('Login')}},
  ]),
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
  providers: [],
})
export class LoginRoutingModule {}
