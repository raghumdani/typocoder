#include <cstdio>
#include <cstring>
#include <algorithm>
#include <iostream>

using namespace std;

const int N = 2005,
          INF = 2000000000;

FILE* fcorrect, *fparticipant, *finput;

void CLOSE() {
  fclose(fcorrect);
  fclose(fparticipant);
  fclose(finput);
}

int arr[N], tmp[N];

int main(int argc, char** argv) {
  fcorrect = fopen(argv[1], "r");
  fparticipant = fopen(argv[2], "r");
  finput = fopen(argv[3], "r");
  
  if (fcorrect == 0 || fparticipant == 0 || finput == 0) {
    cerr << "files null" << endl;
    CLOSE();
    return 1;
  } 
  
  int t;
  fscanf(finput, "%d", &t);
  
  while (t--) {
    int n;
    fscanf(finput, "%d", &n);
    for (int i = 0; i < n; ++i) {
      fscanf(finput, "%d", arr + i);
    }
    int ans, ansP;
    fscanf(fcorrect, "%d", &ans);
    fscanf(fparticipant, "%d", &ansP);
    
    if (ans != ansP) {
      cerr << ans << " != " << ansP << " Jury has the optimal answer" << endl;
      CLOSE();
      return 1;
    }
    
    int id = 0, last = -1;
    for (int i = 0; i < ans; ++i) {
      fscanf(fparticipant, "%d", tmp + i);
      if (i > 0) {
        if (last == -1) last = (tmp[i - 1] < tmp[i]);
        else if (last != (tmp[i - 1] < tmp[i])) {
          CLOSE();
          return 1;
        }
        last ^= 1;
      }
    }
    
    for (int i = 0; i < n && id < ans; ++i) {
      if (arr[i] == tmp[id]) {
        id++;
      }
    }
    
    if (id != ans) {
      CLOSE();
      return 1;
    }
  }
  
  cerr << "The participant has passed this case" << endl; 
  CLOSE();
  return 0;
}
