import { Component, EventEmitter, HostListener, Input, OnInit, Output } from '@angular/core';
import { Post, PostService } from '@app/shared/post/post.service';
import { AuthenticationService, extract } from '@app/core';
import * as moment from 'moment';
import { finalize } from 'rxjs/operators';
import { throwError } from 'rxjs';

export interface ScrollDirection {
  readonly up: string;
  readonly down: string;

  /**
   * Either upwards or downwards
   */
  direction: string;
}

export class ScrollDirection implements ScrollDirection {
  readonly up: string = 'upwards';
  readonly down: string = 'downwards';
  direction: string;

  public constructor(dir: string) {
    if (dir !== this.up && dir !== this.down) {
      throwError(`Scrolldirection must either be ${this.up} or ${this.down}`);
    }
    this.direction = dir;
  }
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
  username: string = null;
  m: any;

  @Input()
  sort: string;
  @Output()
  scroll = new EventEmitter<ScrollDirection>();

  constructor(private postService: PostService, auth: AuthenticationService) {
    const credentials = auth.credentials;
    if (typeof credentials !== 'undefined' && credentials !== null && 'username' in credentials) {
      this.username = credentials.username;
    }
    this.m = moment;
  }

  ngOnInit() {
    this.isLoading = true;
    this.loadPosts();
  }

  like(postId: string) {
    this.postService.like(postId).subscribe((response: any) => {
      if (response.success === true) {
        alert('liked');
      }
    });
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
}
