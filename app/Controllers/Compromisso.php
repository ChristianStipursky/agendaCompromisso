<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CompromissoModel;

class Compromisso extends BaseController
{
    public function addCompromisso()
    {
        if ($this->request->getMethod() == "post") {

            $rules = [
                "titulo" => "required|min_length[5]|max_length[100]",
                //"horario" => "regex_match[(202[1-9]|202[1-9])-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3[0-1])T([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])]",
                //"required|date_format:Y/m/d|regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/",
                //"regex_match[([0-9]{2}\/){2}\d{4}\s[0-2][0-9]\:[0-6][0-9]\s(pm|am)$]",
                //"regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]",
                //"regex_match[(201[4-9]|202[0-9])-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3[0-1]) ([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])]",
                //"horario" => "fromdatetime",
                //"required|regex_match[\d{4}-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3(0|1))]",
            ];

            if (!$this->validate($rules)) {

                return view('add-compromisso', [
                    "validation" => $this->validator,
                ]);
            } else {

                $compromissoModel = new CompromissoModel();

                $data = [
                    'titulo' => $this->request->getVar("titulo"),
                    'horario' => $this->request->getVar("data"),
                ];

                if ($compromissoModel->save($data)){
                    return view("messages", ['message' => 'Compromisso incluído com sucesso!']);
                }else{
                    echo "Ocorreu um erro.";
                }
            }
        }

        return view('add-compromisso');
    }

    public function listCompromisso()
    {
        $request = service('request');
		$searchData = $request->getGet();

		$search = "";
        $dataini = "";
        $datafim = "";

		if (isset($searchData) && isset($searchData['dataini']) && isset($searchData['datafim'])) {
			$dataini = $searchData['dataini'];
            $datafim = $searchData['datafim'];
		}

        if (isset($searchData) && isset($searchData['search'])) {
			$search = $searchData['search'];
		}

		// Get data 
		$compromissoModel = new CompromissoModel();

		if ($search == '') {
			$paginateData = $compromissoModel->paginate(5);
		} else {
			$paginateData = $compromissoModel->select('*')
				->orLike('titulo', $search)  			
				->paginate(5);
		}

        if(!empty($dataini) && !empty($datafim)){
            $paginateData = $compromissoModel->where('horario >=', $dataini)
            ->where('horario <=', $datafim)
            ->paginate(5);
        }

        $data = [
            'compromissos' => $paginateData,
            'pager' => $compromissoModel->pager,
            'search' => $search
        ];

        return view('compromissos', $data);
    }

    public function editCompromisso($id = null)
    {
        $compromissoModel = new CompromissoModel();

        $compromisso = $compromissoModel->where("id", $id)->first();

        if ($this->request->getMethod() == "post") {

            $rules = [
                "titulo" => "required|min_length[5]|max_length[100]",
                //"horario" => "required",
            ];

            if (!$this->validate($rules)) {

                return view('edit-compromisso', [
                    "validation" => $this->validator,
                    "compromisso" => $compromisso,
                ]);
            } else {

                $data = [
                    'titulo' => $this->request->getVar("titulo"),
                    'horario' => $this->request->getVar("data"),
                ];
         
                if ($compromissoModel->update($id, $data)){
                    return view("messages", ['message' => 'Compromisso alterado com sucesso!']);
                }else{
                    echo "Ocorreu um erro.";
                }
            }
        }

        return view('edit-compromisso', [
            "compromisso" => $compromisso,
        ]);
    }

    public function deleteCompromisso($id = null)
    {       
        $compromissoModel = new CompromissoModel();

        if ($compromisso = $compromissoModel->delete($id)){
            return view("messages", ['message' => 'Compromisso excluído com sucesso!']);
        }else{
            echo "Ocorreu um erro.";
        }
    }
}
