<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterByUser;

/**
 * Class IncomeCategory
 *
 * @package App
 * @property string $name
 * @property string $created_by
*/
class IncomeCategory extends Model
{
    use FilterByUser;

    protected $fillable = ['name', 'created_by_id'];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
}
