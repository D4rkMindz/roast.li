import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {PostRoutingModule} from './post-routing.module';
import {PostStreamComponent} from './post-stream/post-stream.component';
import {PostDialogComponent} from './post-dialog/post-dialog.component';
import {CoreModule} from '@app/core';
import {SharedModule} from '@app/shared';

@NgModule({
  declarations: [PostStreamComponent, PostDialogComponent],
  imports: [CommonModule, CoreModule, SharedModule, PostRoutingModule],
  entryComponents: [PostDialogComponent],
  exports: [PostDialogComponent, PostStreamComponent],
})
export class PostModule {}
