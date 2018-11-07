import { Component, Input, OnInit } from '@angular/core';
import { Post, PostService } from '@app/shared/post/post.service';
import { AuthenticationService } from '@app/core';
import * as moment from 'moment';
import { finalize } from 'rxjs/operators';

@Component({
  selector: 'post-stream',
  templateUrl: './post-stream.component.html',
  styleUrls: ['./post-stream.component.scss']
})
export class PostStreamComponent implements OnInit {

  @Input() sort: string;

  posts: Post[];
  posts: Post[];
  isLoading: boolean;
  username: string = null;
  m: any;

  constructor(private postService: PostService, auth: AuthenticationService) {
    const credentials = auth.credentials;
    if (typeof credentials !== 'undefined' && credentials !== null && 'username' in credentials) {
      this.username = credentials.username;
    }
    this.m = moment;
  }

  ngOnInit() {
    this.isLoading = true;
    switch (this.sort) {
      case 'hot':
        this.getHostPosts();
        break;
      case 'new':
        this.getNewPosts();
        break;
      default:
        this.getHostPosts();
        break;
    }
  }

  like(postId: string) {
    this.postService.like(postId)
      .subscribe((response) => {
        if (response.success === true) {
          alert('liked');
        }
      });
  }

  private getHostPosts() {
    this.postService.getHotPosts()
      .pipe(
        finalize(() => {
          this.isLoading = false;
        })
      ).subscribe((posts: Post[]) => {
      this.posts = posts;
    });
  }

  private getNewPosts() {
    this.postService.getNewPosts()
      .pipe(
        finalize(() => {
          this.isLoading = false;
        })
      ).subscribe((posts: Post[]) => {
      this.posts = posts;
    });
  }
}
