import { Injectable } from "@angular/core";
import { MatSnackBar } from "@angular/material";

@Injectable({
  providedIn: "root"
})
export class SnackbarService {
  constructor(private snackbar: MatSnackBar) {}

  public notification(message: string) {
    this.snackbar.open(message, "OK", {
      duration: 2000,
      verticalPosition: "bottom",
      horizontalPosition: "left"
    });
  }

  public error(message: string) {
    this.snackbar.open(message, "FUCK ME!", {
      duration: 3000,
      verticalPosition: "bottom",
      horizontalPosition: "left"
    });
  }
}
