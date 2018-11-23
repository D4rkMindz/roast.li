import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {CompleteUser} from '@app/core/user/user';
import {Observable} from 'rxjs';
import * as moment from 'moment';
import {Logger} from '../logger.service';
import {Role} from '../role/role';
import {UpdateUser} from '@app/core/user/update-user';

const Log = new Logger('USER-SERVICE');

@Injectable({
  providedIn: 'root',
})
export class UserService {
  constructor(private http: HttpClient) {
  }

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

  public async update(user: CompleteUser, update: UpdateUser) {
    const diff = update.diff(user);
    const response: any = await this.http.put(`/users/${user.id}`, JSON.stringify(diff)).toPromise();

    if (response.success) {
      return true;
    }

    return response.validation;
  }

  public async updatePassword(userId: string, oldPassword: string, newPassword: string) {
    const response: any = await this.http.put(`/users/${userId}`, JSON.stringify({
      old_password: oldPassword,
      password: newPassword
    })).toPromise();

    if (response.success) {
      return true;
    }

    return response.validation;
  }

  public async getUser(id: string): Promise<CompleteUser | null> {
    const response: any = await this.http.get(`/users/${id}`).toPromise();
    Log.debug('Got response', response);

    if (response.success) {
      const user = response.user;

      const role = new Role(user.role.name, user.role.position);

      return new CompleteUser(
        user.username,
        user.first_name,
        user.last_name,
        null,
        user.email,
        user.thumbnail_url,
        moment(user.created_at),
        user.created_by,
        moment(user.modified_at),
        user.modified_by,
        moment(user.archived_at),
        user.archived_by,
        user.id,
        role,
      );
    }

    return null;
  }
}
