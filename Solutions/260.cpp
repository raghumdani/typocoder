#include<bits/stdc++.h>
using namespace std;
vector<int>V[100005];
map<int,int>M;
int main()
{
	int T;
	scanf("%d",&T);
	
	while(T--)
	{
		int N;
		scanf("%d",&N);
		int i,j;
		
		for (i=0;i<N;i++)
		{V[i].clear();
			int sz;
			scanf("%d",&sz);
			for (j=0;j<sz;j++)
			{
				int x;
				scanf("%d",&x);
				V[i].push_back(x);
				M[x];
			}
		}
		int k=0;
		for (map<int,int>::iterator it=M.begin();it!=M.end();it++)
		{
			M[it->first]=++k;
		}
		
		int cut=0,block=N;
		for (i=0;i<N;i++)
		{int st=M[V[i][0]];
			for (j=1;j<V[i].size();j++)
			{
				if(M[V[i][j]]!=st+1)
				{
					cut++;
					block++;
					st=M[V[i][j]];
				}
			}
		}
		printf("%d\n",cut+block-1);
		M.clear();		
	}
	
}