import { Injectable } from '@angular/core';
import { SwUpdate } from '@angular/service-worker';
import { extract, SnackbarService } from '..';

@Injectable({
  providedIn: 'root'
})
export class UpdateService {

  constructor(private swUpdate: SwUpdate, private snackbar: SnackbarService) {
  }

  public checkForUpdate() {
    if (this.swUpdate.isEnabled) {
      this.swUpdate.available.subscribe(() => {
        const snack = this.snackbar.important(extract('Updated Available'), extract('Install'));
        snack.onAction().subscribe(() => {
          this.swUpdate.activateUpdate().then(() => window.location.reload());
        });
      });
    }
  }
}
