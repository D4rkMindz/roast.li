import {Injectable} from '@angular/core';
import {Alert, AlertButton, AlertClose, AlertStyle} from './alert-box';
import {MatDialog} from '@angular/material';
import {extract} from '../i18n.service';
import {Observable} from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AlertService {

  constructor(private dialog: MatDialog) {

  }

  info(title: string, message: string): Observable<AlertClose> {
    return Alert.show(this.dialog, title, extract('INFO'), message, AlertButton.OkCancel, true, AlertStyle.Full);
  }

  warning(title: string, message: string): Observable<AlertClose> {
    return Alert.show(this.dialog, title, extract('WARNING'), message, AlertButton.OkCancel, false, AlertStyle.Full);
  }
}
