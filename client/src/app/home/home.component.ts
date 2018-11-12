import { Component, OnInit, QueryList, ViewChildren } from '@angular/core';
import { PostStreamComponent, ScrollDirection } from './post-stream/post-stream.component';
import { MatDialog } from '@angular/material';
import { PostDialogComponent } from '@app/home/post-dialog/post-dialog.component';
import { SnackbarService } from '@app/shared/snackbar/snackbar.service';
import { AuthenticationService, extract } from '@app/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  @ViewChildren(PostStreamComponent)
  postStream: QueryList<PostStreamComponent>;

  username?: string = null;

  constructor(private dialog: MatDialog, private snackbar: SnackbarService, private auth: AuthenticationService) {}

  ngOnInit() {
    const credentials = this.auth.credentials;
    if (typeof credentials !== 'undefined' && credentials && 'username' in credentials) {
      this.username = credentials.username;
    }
  }

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
      width: '50vw'
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result) {
        this.snackbar.notification(extract('Post created'));
        this.postStream.forEach(postStream => {
          postStream.reloadPosts();
        });
      } else {
        this.snackbar.error('Post not created :(');
      }
    });
  }
}
