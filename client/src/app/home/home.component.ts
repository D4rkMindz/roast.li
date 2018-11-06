import { Component, OnInit } from '@angular/core';
import { finalize } from 'rxjs/operators';

import { Post, PostService } from '@app/shared/post/post.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  posts: Post[];
  isLoading: boolean;

  constructor(private postService: PostService) {
  }

  ngOnInit() {
    this.isLoading = true;
    this.postService.getHotPosts()
      .pipe(
        finalize(() => {
          this.isLoading = false;
        })
      ).subscribe((posts: Post[]) => {
      this.posts = posts;
    });
  }

  like(postId: string) {
    this.postService.like(postId)
      .subscribe((response) => {
        if (response.success === true) {
          alert('liked');
        }
      });
  }
}
