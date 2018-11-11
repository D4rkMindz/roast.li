import { Component } from '@angular/core';
import { ScrollDirection } from './post-stream/post-stream.component';
import { MatDialog } from '@angular/material';
import { PostDialogComponent } from '@app/home/post-dialog/post-dialog.component';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent {
  constructor(private dialog: MatDialog) {}

  onScroll(scrollDirection: ScrollDirection) {
    if (scrollDirection.direction === scrollDirection.up) {
      console.log('[HOME]' + scrollDirection.up);
    }
    if (scrollDirection.direction === scrollDirection.down) {
      console.log('[HOME]' + scrollDirection.down);
    }
  }

  addPost() {
    const dialogRef = this.dialog.open(PostDialogComponent, {
      width: '50vw',
    });
    dialogRef.afterClosed().subscribe((result) => {
      if (result) {

      }
    });
  }
}
