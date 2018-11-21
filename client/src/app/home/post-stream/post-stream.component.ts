import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { Post, PostService } from '@app/shared/post/post.service';
import { AuthenticationService, extract } from '@app/core';
import * as moment from 'moment';
import { finalize } from 'rxjs/operators';
import { throwError } from 'rxjs';
import { SnackbarService } from '@app/shared/snackbar/snackbar.service';

export interface ScrollDirection {
  readonly up: string;
  readonly down: string;

  /**
   * Either upwards or downwards
   */
  direction: string;
}

@Component({
  selector: 'post-stream',
  templateUrl: './post-stream.component.html',
  styleUrls: ['./post-stream.component.scss']
})
export class PostStreamComponent implements OnInit {
  posts: Post[] = [];
  loadedLastItem = false;
  isLoading: boolean;
  notAuthenticatedError: string = extract('You must be logged in to like');
  ownPostError: string = extract('You can not like your own posts');
  info: string = extract('Like to share your pleasure');
  m: any;

  @Input()
  sort: string;
  @Output()
  scroll = new EventEmitter<ScrollDirection>();

  constructor(
    private postService: PostService,
    private auth: AuthenticationService,
    private snackbar: SnackbarService
  ) {
    this.m = moment;
  }

  get username(): string {
    const credentials = this.auth.credentials;
    return credentials ? credentials.username : null;
  }

  ngOnInit() {
    this.isLoading = true;
    this.loadPosts();
  }

  onScroll() {
    console.log('[POSTSTREAM] Scroll down');
    this.scroll.emit(new ScrollDirection('downwards'));
    this.loadPosts();
  }

  onScrollUp() {
    console.log('[POSTSTREAM] Scroll up');
    this.scroll.emit(new ScrollDirection('upwards'));
  }

  reloadPosts() {
    this.resetPosts();
    this.loadPosts();
  }

  async like(post: Post) {
    if (post.liked_by_user) {
      this.unlikePost(post);
    } else {
      this.likePost(post);
    }
  }

  async delete(post: Post) {
    const deleted = await this.postService.deletePost(post.id);
    if (deleted) {
      this.snackbar.notification('Post deleted');
      this.reloadPosts();
    }
  }

  private loadPosts() {
    switch (this.sort) {
      case 'hot':
        this.getHotPosts();
        break;
      case 'new':
        this.getNewPosts();
        break;
      default:
        this.getHotPosts();
        break;
    }
  }

  private getHotPosts() {
    if (this.loadedLastItem) {
      return;
    }
    this.postService
      .getHotPosts(this.posts.length)
      .pipe(
        finalize(() => {
          this.isLoading = false;
        })
      )
      .subscribe((posts: Post[]) => {
        console.log(`Loaded ${posts.length} hot posts`);
        if (posts.length < 1) {
          this.loadedLastItem = true;
        }
        this.posts.push(...posts);
      });
  }

  private getNewPosts() {
    if (this.loadedLastItem) {
      return;
    }
    this.postService
      .getNewPosts(this.posts.length)
      .pipe(
        finalize(() => {
          this.isLoading = false;
        })
      )
      .subscribe((posts: Post[]) => {
        console.log(`Loaded ${posts.length} new posts`);
        if (posts.length < 1) {
          this.loadedLastItem = true;
        }
        this.posts.push(...posts);
      });
  }

  private async likePost(post: Post) {
    await this.postService.like(post.id);
    const updatedPost = <Post>await this.postService.getPost(post.id);

    const index = this.posts.indexOf(post);
    this.posts[index] = updatedPost;
    this.snackbar.notification(extract('Post liked'));
  }

  private async unlikePost(post: Post) {
    await this.postService.unlike(post.id);
    const updatedPost = <Post>await this.postService.getPost(post.id);

    const index = this.posts.indexOf(post);
    this.posts[index] = updatedPost;
    this.snackbar.notification(extract('Post unliked'));
  }

  private resetPosts() {
    this.posts = [];
    this.loadedLastItem = false;
  }
}
