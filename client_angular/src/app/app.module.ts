import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";
import { FormsModule } from "@angular/forms";
import { HttpClientModule } from "@angular/common/http";
import { TranslateModule } from "@ngx-translate/core";
import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
import { MaterialModule } from "./material.module";

import { CoreModule } from "@app/core";
import { SharedModule } from "@app/shared";
import { HomeModule } from "@app/home/index";
import { ShellModule } from "@app/shell/index";
import { AboutModule } from "@app/about/index";
import { LoginModule } from "@app/login/index";
import { AppComponent } from "./app.component";
import { AppRoutingModule } from "./app-routing.module";
import { RegisterModule } from "@app/register/register.module";
import { PostModule } from "@app/post/index";
import { ServiceWorkerModule } from "@angular/service-worker";
import { environment } from "../environments/environment";

@NgModule({
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule,
    TranslateModule.forRoot(),
    BrowserAnimationsModule,
    MaterialModule,
    CoreModule,
    SharedModule,
    ShellModule,
    HomeModule,
    AboutModule,
    LoginModule,
    RegisterModule,
    PostModule,
    AppRoutingModule,
    ServiceWorkerModule.register("ngsw-worker.js", { enabled: environment.production }) // must be imported as the last module as it contains the fallback route
  ],
  declarations: [AppComponent],
  providers: [],
  bootstrap: [AppComponent],
  exports: [MaterialModule]
})
export class AppModule {}
