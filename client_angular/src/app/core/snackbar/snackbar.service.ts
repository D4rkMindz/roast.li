import { Injectable } from '@angular/core';
import { MatSnackBar } from '@angular/material';

@Injectable({
  providedIn: 'root',
})
export class SnackbarService {
  constructor(private snackbar: MatSnackBar) {
  }

  public notification(message: string) {
    return this.snackbar.open(message, 'OK', {
      duration: 3000,
      verticalPosition: 'bottom',
      horizontalPosition: 'left',
    });
  }

  public error(message: string) {
    return this.snackbar.open(message, 'FUCK ME!', {
      duration: 4000,
      verticalPosition: 'bottom',
      horizontalPosition: 'left',
    });
  }

  public important(message: string, action: string = 'OK') {
    return this.snackbar.open(message, action, {
      duration: 6000,
      verticalPosition: 'bottom',
      horizontalPosition: 'left',
    });
  }
}
