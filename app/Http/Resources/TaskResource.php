<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Project;
use App\Models\User;
use App\Models\Type;
use App\Models\Progress;
use App\Models\Priority;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'project' => [
                'id' => $this->project_id,
                'title' => Project::find($this->project_id)->title
            ],
            'creator' => [
                'id' => $this->creator_id,
                'name' => User::find($this->creator_id)->name,
                'email' => User::find($this->creator_id)->email
            ],
            'assignee' => [
                'id' => $this->assignee_id,
                'name' => User::findOrNull($this->assignee_id, 'name'),
                'email' => User::findOrNull($this->assignee_id, 'email')
            ],
            'type' => [
                'id' => $this->type_id,
                'name' => Type::find($this->type_id)->name
            ],
            'progress' => [
                'id' => $this->progress_id,
                'name' => Progress::find($this->progress_id)->name
            ],
            'priority' => [
                'id' => $this->priority_id,
                'name' => Priority::find($this->priority_id)->name
            ],
            'tags' => $this->tags,
            'est_duration' => $this->est_duration,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
