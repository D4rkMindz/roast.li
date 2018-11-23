import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {CompleteUser} from '@app/core/user/user';
import {Observable} from 'rxjs';
import * as moment from 'moment';
import {Logger} from '../logger.service';

const Log = new Logger('USER-SERVICE');

@Injectable({
  providedIn: 'root',
})
export class UserService {
  constructor(private http: HttpClient) {}

  public register(user: CompleteUser): Observable<any> {
    return new Observable(observer => {
      Log.debug('registering user');
      this.http.post('/users', user.toJSON()).subscribe(res => {
        observer.next(res);
        observer.complete();
        Log.debug('got response');
        return res;
      });
    });
  }

  public async getUser(id: string): Promise<CompleteUser | null> {
    const response: any = await this.http.get(`/users/${id}`).toPromise();
    Log.debug('Got response', response);
    if (response.success) {
      return new CompleteUser(
        response.username,
        response.first_name,
        response.last_name,
        null,
        response.email,
        response.thumbnail_url,
        moment(response.created_at),
        response.created_by,
        moment(response.modified_at),
        response.modified_by,
        moment(response.archived_at),
        response.archived_by,
        response.id,
      );
    }
    return null;
  }
}
