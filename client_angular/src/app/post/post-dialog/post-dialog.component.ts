import {Component, OnInit} from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {MatDialogRef} from '@angular/material';
import {PostService} from '@app/core';

@Component({
  selector: 'app-post-dialog',
  templateUrl: './post-dialog.component.html',
  styleUrls: ['./post-dialog.component.scss'],
})
export class PostDialogComponent implements OnInit {
  createPostForm: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private postService: PostService,
    private dialogRef: MatDialogRef<PostDialogComponent>,
  ) {
    this.createForm();
  }

  ngOnInit() {}

  async save() {
    const text = this.createPostForm.controls.post.value;
    const response = await this.postService.createPost(text);
    if ('success' in response) {
      this.dialogRef.close(response.success);
    } else {
      this.dialogRef.close(false);
    }
  }

  close() {
    this.dialogRef.close(false);
  }

  private createForm() {
    this.createPostForm = this.formBuilder.group({
      post: ['', [Validators.required]],
    });
  }
}
