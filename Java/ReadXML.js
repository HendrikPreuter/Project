public class Read   {
    BufferedReader br = new BufferedReader(new FileReader(new File(filename.xml)));
    String line;
    StringBuilder sb = new StringBuilder();

    while((line=br.readLine())!= null){
        sb.append(line.trim());
    }
}

