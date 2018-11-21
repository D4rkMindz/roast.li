import { Component, OnInit, QueryList, ViewChildren } from '@angular/core';
import { MatDialog } from '@angular/material';
import { AuthenticationService, extract, SnackbarService } from '@app/core';
import { PostDialogComponent, PostStreamComponent, ScrollDirection } from '@app/post/index';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  @ViewChildren(PostStreamComponent)
  postStream: QueryList<PostStreamComponent>;

  username?: string = null;

  constructor(private dialog: MatDialog, private snackbar: SnackbarService, private auth: AuthenticationService) {
  }

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
        this.postStream.forEach((postStream: PostStreamComponent) => {
          postStream.reloadPosts();
        });
      } else {
        this.snackbar.error('Post not created :(');
      }
    });
  }
}
