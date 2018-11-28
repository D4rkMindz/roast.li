import {NgModule, Optional, SkipSelf} from '@angular/core';
import {CommonModule} from '@angular/common';
import {HttpClient, HttpClientModule} from '@angular/common/http';
import {RouteReuseStrategy, RouterModule} from '@angular/router';
import {TranslateModule} from '@ngx-translate/core';
import {RouteReusableStrategy} from './route-reusable-strategy';
import {AuthenticationService} from './authentication/authentication.service';
import {AuthenticationGuard} from './authentication/authentication.guard';
import {I18nService} from './i18n.service';
import {HttpService} from './http/http.service';
import {HttpCacheService} from './http/http-cache.service';
import {ApiPrefixInterceptor} from './http/api-prefix.interceptor';
import {ErrorHandlerInterceptor} from './http/error-handler.interceptor';
import {CacheInterceptor} from './http/cache.interceptor';
import {UserService} from './user/user.service';
import {PostService} from './post/post.service';
import {SnackbarService} from '@app/core/snackbar/snackbar.service';
import {InfiniteScrollModule} from 'ngx-infinite-scroll';
import {FlexLayoutModule} from '@angular/flex-layout';
import {MaterialModule} from '@app/material.module';
import {ReactiveFormsModule} from '@angular/forms';
import {AvatarModule} from 'ngx-avatar';
import {NgxLinkifyjsModule} from 'ngx-linkifyjs';
import {UpdateService} from './serviceworker/update.service';
import {AlertComponent} from './alert/alert.component';
import {AlertService} from './alert/alert.service';

@NgModule({
  imports: [
    CommonModule,
    HttpClientModule,
    TranslateModule,
    FlexLayoutModule,
    MaterialModule,
    InfiniteScrollModule,
    ReactiveFormsModule,
    AvatarModule,
    RouterModule,
    NgxLinkifyjsModule,
  ],
  providers: [
    AuthenticationService,
    AuthenticationGuard,
    I18nService,
    HttpCacheService,
    ApiPrefixInterceptor,
    ErrorHandlerInterceptor,
    CacheInterceptor,
    UserService,
    UpdateService,
    PostService,
    AlertService,
    SnackbarService,
    {
      provide: HttpClient,
      useClass: HttpService,
    },
    {
      provide: RouteReuseStrategy,
      useClass: RouteReusableStrategy,
    },
  ],
  entryComponents: [AlertComponent],
  exports: [
    FlexLayoutModule,
    AvatarModule,
    InfiniteScrollModule,
    MaterialModule,
    ReactiveFormsModule,
    TranslateModule,
    NgxLinkifyjsModule,
  ],
  declarations: [AlertComponent],
})
export class CoreModule {
  constructor(
    @Optional()
    @SkipSelf()
      parentModule: CoreModule,
  ) {
    // Import guard
    if (parentModule) {
      throw new Error(
        `${parentModule} has already been loaded. Import Core module in the AppModule only.`,
      );
    }
  }
}
