import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { HomeRoutingModule } from './home-routing.module';
import { HomeComponent } from './home.component';
import { QuoteService } from './quote.service';
import { CoreModule } from '@app/core';
import { SharedModule } from '@app/shared';
import { PostModule } from '@app/post/index';

@NgModule({
  imports: [CommonModule, PostModule, CoreModule, SharedModule, HomeRoutingModule],
  declarations: [HomeComponent],
  providers: [QuoteService]
})
export class HomeModule {
}
