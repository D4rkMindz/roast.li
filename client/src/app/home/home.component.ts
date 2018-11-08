import { Component } from '@angular/core';
import { ScrollDirection } from './post-stream/post-stream.component';


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent {
  onScroll(scrollDirection: ScrollDirection) {
    if (scrollDirection.direction === scrollDirection.up) {
      console.log('[HOME]' + scrollDirection.up);
    }
    if (scrollDirection.direction === scrollDirection.down) {
      console.log('[HOME]' + scrollDirection.down);
    }
  }
}
