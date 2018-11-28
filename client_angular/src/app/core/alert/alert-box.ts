import { MatDialog, MatDialogConfig } from '@angular/material';
import { AlertComponent } from './alert.component';

export class Alert {
  static show(
    dialog: MatDialog,
    message: string,
    title: string = 'Alert',
    information: string = '',
    button: number = 0,
    allow_outside_click: boolean = false,
    style: number = 0,
  ) {
    const config = new MatDialogConfig();
    config.width = '80%';
    config.panelClass = 'alert-container';
    config.data = {
      margin: '0 auto',
      title: title || 'Alert',
      message: message,
      information: information,
      button: button || 0,
      style: style,
      allow_outside_click: allow_outside_click || false
    };
    const dialogRef = dialog.open(AlertComponent, config);
    return dialogRef.afterClosed();
  }
}

export enum AlertButton {
  Ok = 0,
  OkCancel = 1,
  YesNo = 2,
  AcceptReject = 3,
}

export enum AlertStyle {
  Simple = 0,
  Full = 1,
}

export class AlertClose {
  private readonly _type: AlertCloseType;

  constructor(type: number = AlertCloseType.OK) {
    this._type = type;
  }

  get type(): AlertCloseType {
    return this._type;
  }
}

export enum AlertCloseType {
  OK = 1,
  CANCEL = 2,
  YES = 3,
  NO = 4,
  ACCEPT = 5,
  REJECT = 6,
}
