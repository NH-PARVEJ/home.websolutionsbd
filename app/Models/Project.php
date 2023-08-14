<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
          /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'website_login_url',
        'user_name',
        'password',
        'server_url',
        'server_user_name',
        'server_password',
        'reference_website',
        'requirements',
        'start_date',
        'delivery_date',
        'project_price',
        'source',
        'handle_by',
        'assign_to',
        'complete_date',
        'client_name',
        'user_id',
        'status',
    ];
}
