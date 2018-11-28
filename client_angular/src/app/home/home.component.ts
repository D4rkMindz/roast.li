import {Component, OnInit, QueryList, ViewChildren} from '@angular/core';
import {MatDialog} from '@angular/material';
import { AuthenticationService, extract, Logger, SnackbarService } from '@app/core';
import {
  PostDialogComponent,
  PostStreamComponent,
  ScrollDirection,
} from '@app/post/index';

const Log = new Logger('HOME');

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements OnInit {
  @ViewChildren(PostStreamComponent)
  postStream: QueryList<PostStreamComponent>;

  username?: string = null;

  constructor(
    private dialog: MatDialog,
    private snackbar: SnackbarService,
    private auth: AuthenticationService,
  ) {}

  ngOnInit() {
    const credentials = this.auth.credentials;
    if (
      typeof credentials !== 'undefined' &&
      credentials &&
      'username' in credentials
    ) {
      this.username = credentials.username;
    }
  }

  onScroll(scrollDirection: ScrollDirection) {
    if (scrollDirection.direction === scrollDirection.up) {
     Log.debug(scrollDirection.up);
    }
    if (scrollDirection.direction === scrollDirection.down) {
      Log.debug(scrollDirection.down);
    }
  }

  addPost() {
    const dialogRef = this.dialog.open(PostDialogComponent, {
      width: '50vw',
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result) {
        this.snackbar.notification(extract('Post created'));
        this.postStream.forEach((postStream: PostStreamComponent) => {
          postStream.reloadPosts();
        });
      } else {
        this.snackbar.error(extract('Post not created :('));
      }
    });
  }
}
