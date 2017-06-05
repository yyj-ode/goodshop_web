<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    /**
     * Store a new record.
     *
     * @param  $input
     * @return User
     */
    public function store($input)
    {
        return $this->save($this->model, $input);
    }

    /**
     * Save the input's data.
     *
     * @param  $model
     * @param  $input
     * @return User
     */
    public function save($model, $input)
    {
        $model->fill($input);

        $model->save();

        return $model;
    }

    /**
     * Get comments by the commentable_id and commentable_type
     * 
     * @param  int $commentableId
     * @param  string $commentableType
     * @return array
     */
    public function getByCommentable($commentableId, $commentableType)
    {
        return $this->model->where('commentable_id', $commentableId)
                    ->where('commentable_type', $commentableType)
                    ->get();
    }

}
