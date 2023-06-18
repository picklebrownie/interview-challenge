<?

require_once 'Database.php';

/**
 * Class Vehicles
 * 
 * This class is used to retrieve vehicles from the database.
 * 
 */
class Vehicles extends Database
{
    public string $filterMake;
    public string $filterModel;
    public string $filterColor;
    public string $filterYear;
    public string $filterCondition;
    public string $filterKeywords;

    /**
     * Vehicles constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $keywords
     */
    public function filterByKeywords($keywords)
    {
        $this->filterKeywords = $keywords;
    }

    /**
     * @param string $condition
     */
    public function filterByCondition($condition)
    {
        $this->filterCondition = $condition;
    }

    /**
     * @param string $color
     */
    public function filterByYear($year)
    {
        $this->filterYear = $year;
    }

    /**
     * @param string $make
     */
    public function filterByMake($make)
    {
        $this->filterMake = $make;
    }

    /**
     * @param string $model
     */
    public function filterByModel($model)
    {
        $this->filterModel = $model;
    }

    /**
     * @param string $color
     */
    public function filterByColor($color)
    {
        $this->filterColor = $color;
    }

    /**
     * Adds the filters to the query
     * 
     * @param string $query the sql query to add the filters to. should only be query before the WHERE clause would go
     * @param Array $excludes any filters to exclude from the query
     * @return string
     */
    private function addFilters($query, $excludes = [])
    {
        $whereClause = '';
        $clauses = [];

        if (isset($this->filterCondition) && !in_array('condition', $excludes)) {
            array_push($clauses, "car_condition = '" . $this->filterCondition . "' ");
        }
        if (isset($this->filterYear) && !in_array('year', $excludes)) {
            array_push($clauses, "year = '" . $this->filterYear . "' ");
        }
        if (isset($this->filterMake) && !in_array('make', $excludes)) {
            array_push($clauses, "make = '" . $this->filterMake . "' ");
        }
        if (isset($this->filterModel) && !in_array('model', $excludes)) {
            array_push($clauses, "model = '" . $this->filterModel . "' ");
        }
        if (isset($this->filterColor) && !in_array('color', $excludes)) {
            array_push($clauses, "color = '" . $this->filterColor . "' ");
        }
        if (!empty($clauses)) {
            foreach ($clauses as $clause) {
                $whereClause .= $whereClause == '' ? 'WHERE ' : 'AND ';
                $whereClause .= $clause;
            }
        }

        // capture any results that have the keywords in any of the fields
        $keywordClauses = [];

        if (isset($this->filterKeywords) && !in_array('keywords', $excludes)) {
            $keywords = explode(' ', $this->filterKeywords);
            foreach ($keywords as $keyword) {
                array_push($keywordClauses, "model LIKE '%" . $keyword . "%' ");
                array_push($keywordClauses, "year LIKE '%" . $keyword . "%' ");
                array_push($keywordClauses, "make LIKE '%" . $keyword . "%' ");
                array_push($keywordClauses, "car_condition LIKE '%" . $keyword . "%' ");
                array_push($keywordClauses, "color LIKE '%" . $keyword . "%' ");
            }
        }

        if (!empty($keywordClauses)) {
            if ($whereClause != '') {
                $whereClause .= 'AND (';
            } else {
                $whereClause .= 'WHERE (';
            }
            foreach ($keywordClauses as $key => $clause) {
                $whereClause .= $clause;
                if ($key !== array_key_last($keywordClauses)) {
                    $whereClause .= 'OR ';
                } else {
                    $whereClause .= ') ';
                }
            }
        }

        return $query . $whereClause;
    }

    /**
     * Gets all conditions for the filtered results 
     * 
     * @return mysqli_result
     */
    public function getConditions()
    {
        $query = "SELECT DISTINCT `car_condition` FROM vehicles ";
        $query = $this->addFilters($query, ['condition']);
        $query .= "ORDER BY `car_condition` ASC";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * Gets all years for the filtered results
     * 
     * @return mysqli_result
     */
    public function getYears()
    {
        $query = "SELECT DISTINCT year FROM vehicles ";
        $query = $this->addFilters($query, ['year']);
        $query .= "ORDER BY year ASC";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }
    /**
     * Gets all colors for the filter make and model
     * 
     * @return mysqli_result
     */
    public function getColors()
    {
        $query = "SELECT DISTINCT color FROM vehicles ";
        $query = $this->addFilters($query, ['color']);
        $query .= "ORDER BY color ASC";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * Gets all vehicles in the filtered results
     * 
     * @param int $offset
     * @param int $resultsPerPage
     * @return mysqli_result
     */
    function getAll($offset, $resultsPerPage)
    {
        $query = "SELECT vehicles.*, images.image_url FROM vehicles LEFT JOIN images ON vehicles.id = images.vehicle_id ";
        $query = $this->addFilters($query);
        $query .= "GROUP BY vehicles.id LIMIT ?, ?";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ii", $offset, $resultsPerPage);
        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * gets count of all vehicles in the filtered results
     * 
     * @return int
     */
    function getCount()
    {
        $query = "SELECT COUNT(*) FROM vehicles ";
        $query = $this->addFilters($query);
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        return $count;
    }

    /**
     * Gets the makes for all vehicles
     * 
     * @return mysqli_result
     */
    function getMakes()
    {
        $query = "SELECT DISTINCT make FROM vehicles ";
        $query = $this->addFilters($query, ['make', 'model']);
        $query .= "ORDER BY make ASC";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * Gets all models for the filter make
     * 
     * @return mysqli_result
     */
    function getModels()
    {
        $query = "SELECT DISTINCT model FROM vehicles ";
        $query = $this->addFilters($query, ['model']);
        $query .= "ORDER BY model ASC";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * Gets a vehicle by id
     * 
     * @param int $id
     */
    function getVehicle($id)
    {
        $query = "SELECT * FROM vehicles WHERE id = ?";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
}
