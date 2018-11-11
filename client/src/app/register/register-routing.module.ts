import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { Shell } from '@app/shell/shell.service';
import { extract } from '@app/core';
import { RegisterComponent } from '@app/register/register.component';

const routes: Routes = [
  Shell.childRoutes([
    { path: 'register', component: RegisterComponent, data: { title: extract('Register') } }
  ])
];

@NgModule({
  imports: [
    RouterModule.forChild(routes),
  ],
  exports: [RouterModule]
})
export class RegisterRoutingModule { }
