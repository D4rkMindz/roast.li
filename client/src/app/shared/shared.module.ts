import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FlexLayoutModule } from '@angular/flex-layout';

import { MaterialModule } from '@app/material.module';
import { LoaderComponent } from './loader/loader.component';
import { InfiniteScrollModule } from 'ngx-infinite-scroll';
import { SnackbarService } from './snackbar/snackbar.service';
import { PostService } from './post/post.service';
import { CoreModule } from '../core/core.module';

@NgModule({
  imports: [FlexLayoutModule, CoreModule, MaterialModule, CommonModule, InfiniteScrollModule],
  declarations: [LoaderComponent],
  providers: [SnackbarService, PostService],
  exports: [LoaderComponent, InfiniteScrollModule]
})
export class SharedModule {}
