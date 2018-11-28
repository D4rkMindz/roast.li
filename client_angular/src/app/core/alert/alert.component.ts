import {Component, Inject} from '@angular/core';
import {MAT_DIALOG_DATA, MatDialogRef} from '@angular/material';
import {AlertClose, AlertCloseType} from './alert-box';

@Component({
  selector: 'app-alert',
  templateUrl: './alert.component.html',
  styleUrls: ['./alert.component.scss']
})
export class AlertComponent {

  style: number;
  title: string;
  message: string;
  information: string;
  button: number;
  allow_outside_click: boolean;
  margin: string;

  constructor(
    public dialogRef: MatDialogRef<AlertComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) {
    this.margin = data.margin || '0 auto';
    this.style = data.style || 0;
    this.title = data.title;
    this.message = data.message;
    this.information = data.information;
    this.button = data.button;
    this.dialogRef.disableClose = !data.allow_outside_click || false;

  }

  onOk() {
    this.dialogRef.close(new AlertClose(AlertCloseType.OK));
  }

  onCancel() {
    this.dialogRef.close(new AlertClose(AlertCloseType.CANCEL));
  }

  onYes() {
    this.dialogRef.close(new AlertClose(AlertCloseType.YES));
  }

  onNo() {
    this.dialogRef.close(new AlertClose(AlertCloseType.NO));
  }

  onAccept() {
    this.dialogRef.close(new AlertClose(AlertCloseType.ACCEPT));
  }

  onReject() {
    this.dialogRef.close(new AlertClose(AlertCloseType.REJECT));
  }


}
