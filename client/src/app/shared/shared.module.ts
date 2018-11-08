import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FlexLayoutModule } from '@angular/flex-layout';

import { MaterialModule } from '@app/material.module';
import { LoaderComponent } from './loader/loader.component';
import { InfiniteScrollModule } from 'ngx-infinite-scroll';

@NgModule({
  imports: [
    FlexLayoutModule,
    MaterialModule,
    CommonModule,
    InfiniteScrollModule
  ],
  declarations: [LoaderComponent],
  exports: [
    LoaderComponent,
    InfiniteScrollModule
  ]
})
export class SharedModule {
}
