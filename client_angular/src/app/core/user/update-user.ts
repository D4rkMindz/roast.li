import {CompleteUser} from '@app/core';

export class UpdateUser {
  private readonly _username?: string = null;
  private readonly _thumbnail_url?: string = null;
  private readonly _old_password?: string = null;
  private readonly _password?: string = null;
  private readonly _first_name?: string = null;
  private readonly _last_name?: string = null;

  constructor(username: string, thumbnail_url: string, old_password: string, password: string, first_name: string, last_name: string) {
    this._username = username;
    this._thumbnail_url = thumbnail_url;
    this._old_password = old_password;
    this._password = password;
    this._first_name = first_name;
    this._last_name = last_name;
  }

  get username(): string {
    return this._username;
  }

  get thumbnail_url(): string {
    return this._thumbnail_url;
  }

  get old_password(): string {
    return this._old_password;
  }

  get password(): string {
    return this._password;
  }

  get first_name(): string {
    return this._first_name;
  }

  get last_name(): string {
    return this._last_name;
  }

  diff(user: CompleteUser) {
    const diff = {};

    if (user.username !== this.username) {
      diff['username'] = this.username;
    }

    if (user.thumbnail_url !== this.thumbnail_url) {
      diff['thumbnail_url'] = this.thumbnail_url;
    }

    if (this.password !== null) {
      diff['first_name'] = this.first_name;
    }

    if (user.first_name !== this.first_name) {
      diff['first_name'] = this.first_name;
    }

    if (user.last_name !== this.last_name) {
      diff['last_name'] = this.last_name;
    }

    return diff;
  }
}
