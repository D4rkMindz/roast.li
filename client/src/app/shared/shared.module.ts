import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FlexLayoutModule } from '@angular/flex-layout';

import { MaterialModule } from '@app/material.module';
import { LoaderComponent } from './loader/loader.component';
import { InfiniteScrollModule } from 'ngx-infinite-scroll';
import { SnackbarService } from '@app/shared/snackbar/snackbar.service';
import { PostService } from '@app/shared/post/post.service';

@NgModule({
  imports: [FlexLayoutModule, MaterialModule, CommonModule, InfiniteScrollModule],
  declarations: [LoaderComponent],
  providers: [SnackbarService, PostService],
  exports: [LoaderComponent, InfiniteScrollModule]
})
export class SharedModule {}
