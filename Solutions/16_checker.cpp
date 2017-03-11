#include <cstdio>
#include <cstring>
#include <algorithm>

using namespace std;

int cnt[26], cnt1[26];
char s[5000];

int main(int argc, char** argv) {
  FILE* fcorrect = fopen(argv[1], "r");
  FILE* fparticipant = fopen(argv[2], "r");
  if(fcorrect == 0 || fparticipant == 0) return 1;
  int odd = 0, n = 0;
  for(int i = 0; i < 26; ++i) {
    fscanf(fcorrect, "%d", cnt + i);
    odd += (cnt[i] % 2);
    n += cnt[i];
  }
  if(fscanf(fparticipant, "%s", s) == EOF) {
            fclose(fcorrect);
  fclose(fparticipant);
     if(n == 0) {
        return 0;
     }
  return 1;
  }
  if(odd > 1) {
    int to = atoi(s);
    if(to != -1) {
       fclose(fcorrect);
  fclose(fparticipant);

      return 1;
    } else {
        fclose(fcorrect);
  fclose(fparticipant);

      return 0;
    }
  }
  int i = 0, j = n - 1;
  while(i <= j) {
    if(s[i] == s[j]) {
      cnt1[s[i] - 'a']++;
      if(i != j) cnt1[s[j] - 'a']++;
      i++; j--;
    } else {
     fclose(fcorrect);
     fclose(fparticipant);
     return 1;
    }
  }
  for(int i = 0; i < 26; ++i) {
    if(cnt[i] != cnt1[i]) {
        fclose(fcorrect);
  fclose(fparticipant);
     return 1;
    }
  }
  fclose(fcorrect);
  fclose(fparticipant);
  return 0;
}
