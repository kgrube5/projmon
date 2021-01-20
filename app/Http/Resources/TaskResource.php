<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Project;
use App\Models\User;

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
            'type' => $this->type_id,
            'progress' => $this->progress_id,
            'priority' => $this->priority,
            'tags' => $this->tags,
            'est_duration' => $this->est_duration,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
