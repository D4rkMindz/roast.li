import { throwError } from 'rxjs';

/**
 * The scroll direction
 */
export class ScrollDirection {
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
