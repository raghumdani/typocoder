#include<bits/stdc++.h>
using namespace std;
vector<long long>V[1000005];
map<long long,long long>M;
int main()
{int T;
 cin>>T;
 while(T--)
 {int n;
  cin>>n;
  int i,j;
  for (j=0;j<n;j++)
   {V[j].clear();
    int sz,t1;
     cin>>sz;
     for (i=0;i<sz;i++)
     {cin>>t1;
      V[j].push_back(t1);
      M[t1];
	 }
	 
   }
   int assign=1;
   for ( map<long long,long long>::iterator it=M.begin();it!=M.end();it++)
     {it->second=assign;
      assign++;
	 }
	int cut=0,block=n;
	for (i=0;i<n;i++)
	{for (j=0;j<V[i].size()-1;j++)
	  {if(M[V[i][j+1]]!=M[V[i][j]]+1)
	   {cut++;block++;
	   }
	  }
	}
	cout<<cut+block-1<<endl;
  M.clear();
 }
 return 0;
}